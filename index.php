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

        <header class="bg-[#B723F7] flex gap-4">
            
            <div class="container mx-auto flex gap-4 w-[85%] h-auto">
                <div class="text-[18px] text-white font-bold flex items-center p-2">Scpel Community</div>
                <div class="flex-1  items-center flex">
                    <ul class="flex gap-4 text-gray-100">
                        <li>
                            <a href="" class=" px-2">Learn</a>
                        </li>
                        <li><a href="" class=" px-2">Documentation</a></li>
                        <li><a href="" class=" px-2">Downloads</a></li>
                        <li><a href="" class=" px-2" >Packages</a></li>
                        <li><a href="" class=" px-2" >Community</a></li>
                    </ul>
                </div>
                <div class="flex items-center">
                    <input type="text" name="search"> &nbsp;
                    <button class="bg-gray-100 text-black px-2">Search</button>
                </div>
            </div>
        </header>

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

                <div hx-get="/api/forum" hx-trigger="load">
                    <img  alt="Result loading..." class="htmx-indicator" width="50" src="/images/loading.gif"/>
                </div>

            </div>
        </section>
    
    
    
        
</html>