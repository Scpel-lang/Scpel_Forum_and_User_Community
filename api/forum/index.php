<?php

require_once "../utils/header.php";

$main_table = "Scpel_Threads";

switch ($method) {
    case 'GET':
        if (isset($_GET['thread']) and !empty($_GET['thread'])) {
            return get_thread_information(validate($_GET['thread']));
        }
        return all_threads();

    case 'POST':
        if (isset($_POST['name']) and isset($_POST['subject']) and isset($_POST['email']) and isset($_POST['message'])) {
            $name = validate($_POST['name']);
            $subject = validate($_POST['subject']);
            $email = validate($_POST['email']);
            $message = validate($_POST['message']);

           
            if (!empty($name) and !empty($subject) and !empty($email) and !empty($message)) {
                $sql = "INSERT INTO ".$main_table." (Name,Email,Subject,Message) VALUES('".$name."','".$email."','".$subject."','".$message."')";
                $query = mysqli_query($db,$sql);
                if ($query) {
                    
                    ?>
                    <div class="bg-green-500 px-4 py-2 text-white">Thank your for your contribution, Thread successfully created.</div>
                    <script>
                        setTimeout(()=>{
                            location.href = '/'
                        },3000);
                    </script>
                    
                    <?php
                    
                }
                else{
                    ?>
                    <div class="bg-red-500 px-4 py-2 text-white">Something went wrong, please try again in a moment</div>
                    <?php
                }
            }
            else{
                ?>
                <div class="bg-red-500 px-4 py-2 text-white">Make sure you filled all fields of the form correctly.</div>
                <?php
            }

        }
    
}




function all_threads(){
    global $main_table;
    global $db;

    $sql = "SELECT * FROM ".$main_table." ORDER BY  ThreadID DESC";
        $query = mysqli_query($db,$sql);
        while ($fetch = mysqli_fetch_assoc($query)) {
            ?>
            <div class="flex flex-col my-2 bg-gray-50 gap-2 p-2 shadow-sm">
                <div class="flex px-2 bg-gray-300">
                    <a href="?thread=<?php echo $fetch['ThreadID']; ?>" class="flex-1 hover:underline flex font-bold">#<?php echo $fetch['ThreadID']." ".$fetch['Subject']; ?></a>
                    <div class="flex"><?php echo get_time_elapsed_string($fetch['createdAt'],false); ?></div>
                </div>
                <div class="flex ">
                    <div class="bg-[#E5E7EB] min-h-[180px] w-[200px] justify-between text-sm p-2 flex flex-col">
                        <div>
                            <div><?php echo $fetch['Name']; ?></div>
                            <div>
                                <img src="https://ui-avatars.com/api/?name=<?php echo $fetch['Name']; ?>&background=random" alt="" srcset="">
                            </div>
                        </div>
                        <div class="grid">
                            <a href="#">Share Post</a>
                            <a href="?thread=<?php echo $fetch['ThreadID']; ?>" class="hover:underline">Reply to Post</a>
                        </div>
                    </div>
                    <div class="flex-1 p-2 flex flex-col">
                        <?php echo $fetch['Message'] ?>
                    </div>
                </div>
            </div>
            <?php
        }
}



function get_thread_information($id){
    global $db;
    global $main_table;

    $sql = "SELECT * FROM ".$main_table." WHERE ThreadID='".$id."' ";
    $query = mysqli_query($db,$sql);
    $fetch_main = mysqli_fetch_assoc($query);

    ?>
    <div>
        <div class="flex flex-col my-2 bg-gray-50 gap-2 p-2 shadow-sm">
            <div class="flex px-2 bg-gray-300">
                <a href="" class="flex-1 hover:underline flex font-bold">#<?php echo $fetch_main['ThreadID']." ".$fetch_main['Subject']; ?></a>
                <div class="flex"><?php echo get_time_elapsed_string($fetch_main['createdAt'],false); ?></div>
            </div>
            <div class="flex ">
                <div class="bg-[#E5E7EB] min-h-[180px] w-[200px] justify-between text-sm p-2 flex flex-col">
                    <div>
                        <div><?php echo $fetch_main['Name']; ?></div>
                        <div>
                            <img src="https://ui-avatars.com/api/?name=<?php echo $fetch_main['Name']; ?>&background=random" alt="" srcset="">
                        </div>
                    </div>
                    <div class="grid">
                        <a href="#">Share Post</a>
                        <a href="reply.php?thread=<?php echo $fetch_main['ThreadID']; ?>" class="hover:underline">Reply to Post</a>
                    </div>
                </div>
                <div class="flex-1 p-2 flex flex-col">
                    <?php echo $fetch_main['Message'] ?>
                </div>
            </div>
        </div>
    </div>
    <div hx-get="api/forum/replies.php?thread=<?php echo $fetch_main['ThreadID']; ?>" hx-trigger="load">
        <img  alt="Result loading..." class="htmx-indicator" width="50" src="/images/loading.gif"/>
    </div>
    <?php
}

?>