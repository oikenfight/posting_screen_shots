#!/bin/sh

today=$(date "+%Y%m%d")

screen_shot_path="/sdcard/test/"
images_path="./storage/app/public/${today}"

echo $screen_shot_path

# ディレクトリがなければ作成
if [ ! -e $images_path ]; then mkdir $images_path ; fi

while :
do
    # screen on
    adb shell input keyevent 82
    echo "turn on the screen"

    now=$(date "+%Y%m%d_%H%M%S")

    image_name="${now}.png"

    echo "image name: ${image_name}"

    # screen shot
    adb shell screencap -p ${screen_shot_path}${image_name}
    echo "screen shot"

    # pull image
    adb pull ${screen_shot_path}${image_name} ${images_path}/${image_name}
    echo "pull the image"

    # remove image
    adb shell rm ${screen_shot_path}${image_name}
    echo "remove the image"

    echo "wait 3 second"
    sleep 3
done