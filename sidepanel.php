<!-- Side Panel (left div) -->
<div class="w-1/5 flex flex-col p-2">
    <div class="w-full h-80">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Discussions</h5>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <?php foreach(fetchLatestDiscussions($db) as $discussion): ?>
                    <li class="py-1 hover:bg-gray-100 cursor-pointer">
                        <a href="?thread=<?php echo $discussion['ID']; ?>" class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($discussion['USER_NAME']); ?>&background=random" alt="User Image">
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white"><?php echo $discussion['SUBJECT']; ?></p>
                                <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">by <?php echo $discussion['USER_NAME']; ?></p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">1 day ago</p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
