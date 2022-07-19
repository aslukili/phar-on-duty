<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmacy on duty</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>
<body>
<main class="h-screen flex justify-center items-center">
    <form method="post" class="bg-sky-300 max-w-md shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        @csrf
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                email
            </label>
            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="email">
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input name="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-900 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" >
                Sign In
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Forgot Password?
            </a>
        </div>
    </form>

</main>
</body>
</html>
