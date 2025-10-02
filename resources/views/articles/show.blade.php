<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
        body { font-family: 'Manrope', sans-serif; }
    </style>
    <title>Document</title>
</head>
<body>
    <x-navbar />
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="w-4/5 flex flex-col items-center">
            <div class="mb-12 px-10">
                <img src="{{ asset('images/artikel.png') }}" alt="Logo" class=" py-10">
                <h1 class="text-2xl font-bold mb-6">
                    Lorem ipsum dolor sit.
                </h1>
                <p class="text-gray-900 leading-relaxed text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error cumque maxime qui repellendus, numquam quae laudantium distinctio quaerat earum illo quo officia a accusamus, praesentium nulla harum quis quam consequuntur perferendis! Voluptatum nesciunt molestias architecto at, et pariatur quasi doloremque reprehenderit, neque a odio hic vitae aliquam, aliquid mollitia assumenda sequi id eius ducimus nemo soluta consequuntur natus optio? Earum natus enim voluptatem impedit maxime illo dolorum quibusdam sapiente eligendi laudantium, recusandae tempore voluptatibus modi praesentium aspernatur minima sit culpa. Libero tenetur ratione, explicabo odio obcaecati asperiores praesentium vero, officia laborum dolorem voluptates voluptatem quo! Doloribus blanditiis itaque possimus assumenda cum nemo aliquid id corporis! Temporibus unde ut suscipit, provident illo repudiandae aut quod molestias dicta minus mollitia, facere sapiente est cumque optio cupiditate sunt totam? Aperiam a aspernatur quibusdam, optio labore quidem. Dignissimos esse odit error dolore laudantium saepe ipsum tempora labore itaque consectetur! Error molestias esse cumque quia corporis obcaecati fugit eaque sapiente animi, libero hic ratione, voluptas, odio saepe! Itaque necessitatibus porro temporibus? Porro provident explicabo consectetur ab neque culpa obcaecati corrupti voluptate eos odit nam fugiat asperiores similique minima quis, ducimus voluptatem officiis autem inventore laborum necessitatibus! Totam voluptatem atque cupiditate amet quam quaerat ad nemo!</p>
            </div>

        </div>
    </div>
</body>
</html>
