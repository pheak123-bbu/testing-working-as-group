<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for modal and form */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 80%;
            max-width: 800px;
            animation: modalopen 0.3s ease-out;
        }
        
        @keyframes modalopen {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.5rem;
        }
        
        .form-col {
            flex: 1;
            padding: 0 0.5rem;
            min-width: 200px;
        }
        
        .image-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0 auto 1rem;
            border: 2px dashed #bbb;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .image-preview:hover {
            background-color: #e9e9e9;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .image-placeholder {
            color: #777;
            font-size: 14px;
            text-align: center;
        }
        
        .btn-upload {
            width: 100%;
            padding: 0.5rem;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .btn-upload:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Button to trigger modal -->
    <div class="container mx-auto p-4 text-center">
        <button onclick="openModal()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition duration-200">
            + Add New User
        </button>
    </div>

    <!-- The Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Add New User</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            
            <form id="userForm" action="/users" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div class="form-row">
                    <!-- Left Column - Profile Picture -->
                    <div class="form-col">
                        <div class="image-preview" id="imagePreview" onclick="document.getElementById('imageUpload').click()">
                            <div class="image-placeholder">Click to upload profile picture</div>
                        </div>
                        <input type="file" id="imageUpload" name="profile_image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                        <button type="button" class="btn-upload" onclick="document.getElementById('imageUpload').click()">Upload Image</button>
                    </div>
                    
                    <!-- Right Column - Form Fields -->
                    <div class="form-col" style="flex: 2;">
                        <div class="space-y-4">
                            <!-- First Row -->
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" id="name" name="name" required 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" id="email" name="email" required 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            
                            <!-- Second Row -->
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                    <input type="text" id="username" name="username" required 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                    <input type="password" id="password" name="password" required 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                            
                            <!-- Third Row -->
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="position" class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                                    <select id="position" name="position" required 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">Select Position</option>
                                        <option value="admin">Admin</option>
                                        <option value="supplier">Supplier</option>
                                        <option value="stock_checker">Stock Checker</option>
                                        <option value="purchaser">Purchaser</option>
                                        <option value="distributor">Distributor</option>
                                        <option value="staff">Staff</option>
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 mt-6">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal functions
        function openModal() {
            document.getElementById('userModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal() {
            document.getElementById('userModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            document.getElementById('userForm').reset();
            document.getElementById('imagePreview').innerHTML = '<div class="image-placeholder">Click to upload profile picture</div>';
        }
        
        // Image preview function
        function previewImage(event) {
            const reader = new FileReader();
            const imagePreview = document.getElementById('imagePreview');
            
            reader.onload = function() {
                imagePreview.innerHTML = '';
                const img = document.createElement('img');
                img.src = reader.result;
                img.className = 'preview-image';
                imagePreview.appendChild(img);
            }
            
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target == modal) {
                closeModal();
            }
        }
        
        // Form submission handler (example)
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the form submission with AJAX
            
            // Simulate success response
            alert('User added successfully!');
            closeModal();
        });
    </script>
</body>
</html>
