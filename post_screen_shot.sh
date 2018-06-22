#!/bin/sh -eu

today=$(date "+%Y%m%d")

screen_shot_storage_path="/sdcard/test/"
tmp_storage_path="./storage/images/"
post_url='http://127.0.0.1/api/upload'

# ディレクトリがなければ作成
if [ ! -e './storage/images' ]; then mkdir './storage/images' ; fi

while true
do
    # screen on
    adb shell input keyevent 82
    echo "turn on the screen"

    now=$(date "+%Y%m%d_%H%M%S")
    image_name="${now}.png"
    screen_shot_path=${screen_shot_storage_path}${image_name}
    tmp_image_path=${tmp_storage_path}${image_name}

    echo "image name: ${image_name}"

    # screen shot
    adb shell screencap -p ${screen_shot_path}
    echo "screen shot"

    # pull image
    adb pull ${screen_shot_path} ${tmp_image_path}
    echo "pull the image"

    # post image
    response=$( curl POST -F image=@${tmp_image_path} -F date=${today} ${post_url} )
    if [ $response = 200 ]; then
        echo 'posted the image'
    else
        echo "error when posting ${tmp_image_path}!!! try again."
    fi

    # remove image from screen_shot directory and storage
    adb shell rm ${screen_shot_path}
#    rm ${tmp_image_path}
    echo "remove the image"

    echo "wait 3 second"
    echo ""
    sleep 3
done