#!/bin/bash
export release_date="$(date -u +%Y-%m-%d-%H-%M)"
export release_branch="release-$release_date"

# Get the current working directory
current_folder=$(pwd)
export local_project_path="$current_folder"
export local_build_path="$current_folder/public/build"

export project_path="/home/cbmedia/repositories/public-site-ave"

export cpanel_php_path="/opt/cpanel/ea-php83/root/usr/bin/php"
export cpanel_public_path="/home/cbmedia/public_html/ave.cbmedia-asia.com"

export cpanel_project_public_path="$project_path/public"
export cpanel_project_build_path="$project_path/public/build"
export cpanel_project_htaccess_path="$project_path/public/.htaccess"
export cpanel_project_assets_path="$project_path/public/assets"
export cpanel_project_css_path="$project_path/public/css"
export cpanel_project_js_path="$project_path/public/js"

export cpanel_public_build_path="$cpanel_public_path/build"
export cpanel_public_assets_path="$cpanel_public_path/assets"

function prepare_build() {
    execute_on_remote_server "
        mkdir -p $cpanel_project_build_path &&
        mkdir -p $cpanel_public_build_path &&
        ln -s $cpanel_project_public_path/build $cpanel_public_path/build &&
        ln -s $cpanel_project_public_path/assets $cpanel_public_path/assets &&
        ln -s $cpanel_project_public_path/css $cpanel_public_path/css &&
        ln -s $cpanel_project_public_path/js $cpanel_public_path/js &&
        ln -s $cpanel_project_public_path/vendor $cpanel_public_path/vendor &
        ln -s $cpanel_project_public_path/robots.txt $cpanel_public_path/robots.txt
    "

    execute_on_remote_server "mkdir -p $cpanel_public_build_path"
}

function prepare_release_branch() {
    cd $local_project_path && git checkout master && git pull origin master --rebase &&
    git stash && composer install --ignore-platform-req=ext-intl --ignore-platform-req=ext-exif && npm install && git checkout -b "$release_branch" &&
        rm -fR public/build && npm run build && git commit -m "release: $release_date" &&
        # Delete old release branches on the server
        old_release_branch_pattern="release-$(date -d '1 week ago' +%Y-%m-%d)-*" &&
        execute_on_remote_server "cd $project_path && git branch -D \$(git branch -r | grep 'origin/$old_release_branch_pattern')"
}


function deploy_to_cpanel() {
    echo "=== Entering deploy_to_cpanel ==="

    cd $local_project_path && git push -u prod &&
        echo "Pushing changes to 'prod' remote"

    # Create temporary tar.gz of build directory
    echo "Creating compressed build archive..."
    tar -czf build.tar.gz -C public build &&
        echo "Build directory compressed successfully"

    # Upload compressed file
    echo "Uploading compressed build to server..."
    scp -P 6262 build.tar.gz cbmedia@v11879.securev.net:/tmp/ &&
        echo "Compressed build uploaded successfully"

    # Extract on server and move files to appropriate locations
    execute_on_remote_server "
        cd /tmp &&
        rm -rf $cpanel_public_build_path &&
        tar -xzf build.tar.gz -C /tmp &&
        mv /tmp/build $cpanel_public_build_path &&
        cp -r /tmp/build/manifest.json $cpanel_project_build_path/ &&
        rm -f build.tar.gz
    " &&
        echo "Build files extracted and placed in correct locations"

    # Clean up local tar.gz
    rm -f build.tar.gz &&
        echo "Local compressed file cleaned up"

    # Direct upload for efficiency:
    scp -rp -P 6262 $local_build_path/manifest.json cbmedia@v11879.securev.net:$cpanel_project_build_path &&
        echo "Uploaded local build to the project path"

    # Additional actions
    execute_on_remote_server "cd $project_path && git stash" &&
        echo "Stashed changes on the cPanel server"

    execute_on_remote_server "cd $project_path && git checkout $release_branch" &&
        echo "Checked out the release branch on the cPanel server"

    echo "=== Exiting deploy_to_cpanel ==="
}
function clear_application_cache() {
    execute_on_remote_server "cd $project_path" \
        "$cpanel_php_path artisan cache:clear" \
        "$cpanel_php_path artisan auth:clear-resets" \
        "$cpanel_php_path artisan optimize:clear" \
        "$cpanel_php_path artisan config:clear" \
        "$cpanel_php_path artisan filament:optimize-clear"
}

function generate_application_cache() {
    execute_on_remote_server "cd $project_path" \
        "$cpanel_php_path artisan filament:cache" \
        "$cpanel_php_path artisan config:cache" \
        "$cpanel_php_path artisan route:cache" \
        "$cpanel_php_path artisan route:clear" \
        "$cpanel_php_path artisan view:cache" \
        "$cpanel_php_path artisan filament:optimize" \
        "$cpanel_php_path artisan filament:cache-components" \
         "$cpanel_php_path artisan generate-sitemap"
}

function run_server_commands() {
    execute_on_remote_server "cd $project_path && $cpanel_php_path artisan migrate"
    execute_on_remote_server "cd $project_path && $cpanel_php_path /opt/cpanel/composer/bin/composer install --ignore-platform-req=ext-sodium"
    clear_application_cache
    generate_application_cache
}

function symlink_folders() {
    execute_on_remote_server "
        cd $project_path/public &&
        ln -s $project_path/* $cpanel_public_path/*
    "
}

function execute_on_remote_server() {
    if [ $# -eq 1 ] && [ -n "$1" ]; then
        # Single command string
        local ssh_command="$1"
        ssh -p 6262 cbmedia@v11879.securev.net "$ssh_command"
    elif [ $# -gt 1 ]; then
        # Multiple commands as separate arguments
        local commands=("$@")
        local combined_command=""
        for cmd in "${commands[@]}"; do
            combined_command+="$cmd && "
        done
        combined_command=${combined_command% && }  # Remove trailing &&
        ssh -p 6262 cbmedia@v11879.securev.net "$combined_command"
    fi
}

function main() {
    prepare_build
    prepare_release_branch
    deploy_to_cpanel
    symlink_folders
    run_server_commands
}

# Entry point to your script
main
