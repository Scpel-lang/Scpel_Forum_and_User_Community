<!-- Display Thread and Replies -->
<div class="border border-4 mb-4 border-gray-500">
    <div class="h-10 flex justify-between w-full bg-gray-200">
        <p class="m-2"><?php echo $thread['SUBJECT']; ?></p>
        <p class="m-2">5 hours ago</p>
    </div>
    <div class="flex  w-full">
        <div class="p-4 w-60 bg-gray-100">
            <div class="w-full">
                <h1><?php echo $thread['USER_NAME']; ?></h1>
                <div class="">
                    <img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($thread['USER_NAME']); ?>&background=random">
                </div>
            </div>
            <div class="mt-20">
                <ul>
                    <li><a>Share Post</a></li>
                    <li><a href="./forum_reply.php?forum=<?php echo $thread['ID']; ?>">Reply to Post</a></li>
                    <li>Github Account</li>
                </ul>
            </div>
        </div>
        <div class="w-full p-4 bg-white">
            <p><?php echo $thread['MESSAGE']; ?></p>
        </div>
    </div>
</div>
<?php foreach($replies as $reply): ?>
    <div class="border ml-10 border-4 mb-4 border-gray-500">
        <div class="h-10 flex justify-between w-full bg-gray-200">
            <p class="m-2">RE: <?php echo $reply['SUBJECT']; ?></p>
            <p class="m-2">5 hours ago</p>
        </div>
        <div class="flex  w-full">
            <div class="p-4 w-60 bg-gray-100">
                <div class="w-full">
                    <h1><?php echo $reply['USER_NAME']; ?></h1>
                    <div class="">
                        <img class="" src="https://ui-avatars.com/api/?name=<?php echo urlencode($reply['USER_NAME']); ?>&background=random">
                    </div>
                </div>
                <div class="mt-20">
                    <ul>
                        <li><a>Share Post</a></li>
                        <li><a href="./forum_reply.php?forum=<?php echo $reply['ID']; ?>">Reply to Post</a></li>
                        <li>Github Account</li>
                    </ul>
                </div>
            </div>
            <div class="w-full p-4 bg-white">
                <p><?php echo $reply['MESSAGE']; ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
