<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Daftar Usaha - UniPOS</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">


    <div class="bg-white w-full max-w-md p-8 rounded-xl shadow-lg">

        <h2 class="text-2xl font-bold text-center mb-6">
            Daftarkan Usaha Anda
        </h2>


        <form method="POST" action="/register-usaha" enctype="multipart/form-data">

            @csrf


            <!-- Nama Usaha -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    Nama Usaha
                </label>

                <input
                    type="text"
                    name="nama_usaha"
                    class="w-full border rounded-lg px-3 py-2"
                    placeholder="Contoh: Toko Maju Jaya"
                >

            </div>


            <!-- Alamat -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    class="w-full border rounded-lg px-3 py-2"
                    placeholder="Alamat usaha"
                ></textarea>

            </div>


            <!-- No Telp -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    No Telepon
                </label>

                <input
                    type="text"
                    name="telp"
                    class="w-full border rounded-lg px-3 py-2"
                    placeholder="08xxxxxxxx"
                >

            </div>


            <!-- Logo -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    Logo Usaha
                </label>

                <input
                    type="file"
                    name="logo"
                    class="w-full"
                >

            </div>


            <hr class="my-6">


            <!-- Nama Owner -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    Nama Owner
                </label>

                <input
                    type="text"
                    name="nama_owner"
                    class="w-full border rounded-lg px-3 py-2"
                >

            </div>


            <!-- Email -->
            <div class="mb-4">

                <label class="block text-sm mb-1">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded-lg px-3 py-2"
                >

            </div>


            <!-- Password -->
            <div class="mb-6">

                <label class="block text-sm mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg px-3 py-2"
                >

            </div>


            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg"
            >
                Daftarkan Usaha
            </button>


        </form>

    </div>


</body>
</html>