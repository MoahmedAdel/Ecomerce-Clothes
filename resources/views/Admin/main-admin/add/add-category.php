<?php
include "../../../../../app/middleware/admin/main-admin/auth.php";
$base_url_logout = "../../../../../app/requests/";
$base_url_img = "../../../../assets/img/";
$base_url_link = "../";
include_once "../../../Layouts/admin/main-admin/sidebar.php";
include_once "../../../Layouts/admin/main-admin/navbar.php";
?>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Add Category
        </h2>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Invalid input
                </span>
                <input
                    class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                    placeholder="Jane Doe" />
                <span class="text-xs text-red-600 dark:text-red-400">
                    Your password is too short.
                </span>
            </label>
        </div>
    </div>
</main>
<?php
include_once "../../../Layouts/admin/footer.php";
include_once "../../../Layouts/admin/footer-script.php";