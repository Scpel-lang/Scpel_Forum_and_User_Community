<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Welcome to Scpel - A Systems reflective meta-programming language for AI</title>
        <!-- Include Tailwind CSS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/main.css" />    
        <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    </head>
    
    <body class="h-screen">

        <?php 
            include_once "inc/header.php";
        ?>

        <br>
        <section class="container mx-auto gap-4 flex w-[80%]">
            <div class="bg-[#F5F5F5] p-4 w-[200px]">
                <ul>
                    <li>
                        <h2 class="text-[#333333]">Forum</h2>
                        <hr>
                        <ul>
                            <li> <a href="/" class=" text-[#B723F7]">Forum Index</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col flex-1">
                <div>
                    <h1 class="text-[20px] font-bold">Scpel Programming Language Forum</h1>
                    <p>Subconscious Electronic Programming Language</p>
                </div>

                <div>
                    <div id="result" hx-target="#result" hx-swap="innerHTML" hx-trigger="revealed">
                    </div>
                    <form hx-post="/api/forum" class="flex flex-col" hx-on::after-request=" if(event.detail.successful) this.reset()"  hx-target="#result" hx-swap="innerHTML" method="post">
                        <span>Name</span>
                        <input type="text" name="name" id="">
                        <span>Email</span>
                        <input type="text" name="email"/>
                        
                        <span>Subject</span>
                        <input type="text" name="subject" id="">
                        <span>Message</span>
                        <textarea name="message" id="" cols="30" rows="10"></textarea>
                        <br>
                        <div class="form flex gap-2">
                            <button type="submit" class="flex items-center" name="submit">Send</button>
                            <div class="flex items-center">
                                <input type="checkbox" class="cursor-pointer" name="allow_markdown">
                                &nbsp;
                               <div class="flex items-center gap-2 ">
                                <span>Enable</span> <a class="text-[#B723F7] hover:underline" href="">Markdown</a>
                               </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    
    
    
        
</html>