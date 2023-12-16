<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/Profile.css">
    <title>adelinefellita</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#icon-menu').click(function(){
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="{{ asset('images/adeline.png') }}" alt="">
        </div>
        <label class="logo-title">FruityRipe</label>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Login</a></li>
            <li><i class="fas fa-user"></i></li>
        </ul>
        <label class="icon-menu" id="icon-menu">
            <i class="fas fa-bars"></i>
        </label>
    </nav>
    <div class="wrapper" id="profile-card">
        <div class="left">
            <input type="file" id="profileImageInput" style="display: none;">
            <label for="profileImageInput">
                <img src="./assets/images/adeline.png" alt="" id="profileImage" width="100">
            </label>
            <h4 id="username">adelinefellita</h4>
            <p>Intermediate</p>
        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info-data" id="edit-form" style="display: none;">
                    <form id="profile-form">
                        <div class="data">
                            <h4>Firstname</h4>
                            <input type="text" id="firstname" value="Adeline">
                        </div>
                        <div class="data">
                            <h4>Lastname</h4>
                            <input type="text" id="lastname" value="Fellita">
                        </div>
                        <!-- Tambahkan ID pada tombol Save dan tombol Cancel -->
                        <div class="button-save-cancel">
                            <button type="submit" id="saveButton">Save</button>
                            <button type="button" id="cancelButton" onclick="cancelEdit()">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="data" id="display-data">
                    <h4>Firstname</h4>
                    <p>Adeline</p>
                </div>
                <div class="data" id="lastname-data">
                    <h4>Lastname</h4>
                    <p>Fellita</p>
                </div>
                <div class="data">
                    <h4>Email</h4>
                    <p>adelinefellita@gmail.com</p>
                </div>
                <div class="data">
                    <h4>Username</h4>
                    <p>adelinefellita</p>
                </div>
                <button class="edit-button" id="editable-username" onclick="toggleEditForm()"><i class="fa-regular fa-pen-to-square"></i>Edit profile</button>
            </div>
        </div>
    </div>
    
    <script>
        function toggleEditForm() {
            const editForm = document.getElementById('edit-form');
            const displayData = document.getElementById('display-data');
            const lastnameData = document.getElementById('lastname-data');
            const editableUsername = document.getElementById('editable-username');

            const saveButton = document.getElementById('saveButton');
            const cancelButton = document.getElementById('cancelButton');

            if (editForm.style.display === 'none') {
                // Switch to edit mode
                displayData.style.display = 'none';
                lastnameData.style.display = 'none';
                editableUsername.style.display = 'none';
                editForm.style.display = 'block';

                // Tampilkan tombol Save dan tombol Cancel
                saveButton.style.display = 'inline-block';
                cancelButton.style.display = 'inline-block';
            } else {
                // Switch back to display mode
                displayData.style.display = 'block';
                lastnameData.style.display = 'block';
                editableUsername.style.display = 'block';
                editForm.style.display = 'none';

                // Sembunyikan tombol Save dan tombol Cancel
                saveButton.style.display = 'none';
                cancelButton.style.display = 'none';
            }
        }

        function cancelEdit() {
            // Switch back to display mode without saving changes
            toggleEditForm();
        }

        document.getElementById('profile-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            // Update the display with the new values
            const firstnameInput = document.getElementById('firstname');
            const lastnameInput = document.getElementById('lastname');
            const displayData = document.getElementById('display-data');
            const lastnameData = document.getElementById('lastname-data');
            const editableUsername = document.getElementById('editable-username');

            displayData.innerHTML = '<h4>Firstname</h4><p>' + firstnameInput.value + '</p>';
            lastnameData.innerHTML = '<h4>Lastname</h4><p>' + lastnameInput.value + '</p>';
            //editableUsername.innerText = firstnameInput.value + ' ' + lastnameInput.value;

            // Switch back to display mode
            toggleEditForm();
        });
    
        function cancelEdit() {
            // Switch back to display mode without saving changes
            toggleEditForm();
        }


        // Buat upload foto
        document.getElementById('profileImageInput').addEventListener('change', handleImageUpload);

        function handleImageUpload(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                const image = document.getElementById('profileImage');
                image.src = reader.result;
            };

            if (input.files.length > 0) {
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    
    
    </script>
    
    
</body>
</html>