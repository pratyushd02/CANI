<?php
    session_start();
    include('./includes/db.php');
    if(!isset($_SESSION['first'])){
        header('location: ./login.php');
    }

    // if(isset()){
    // }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./css/all.css">


  <!-- --------- Owl-Carousel ------------------->
  <link rel="stylesheet" href="./css/owl.carousel.min.css">
  <link rel="stylesheet" href="./css/owl.theme.default.min.css">

  <!-- --------- Bootstrap CDN ------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

  <!-- ------------ AOS Library ------------------------- -->
  <link rel="stylesheet" href="./css/aos.css">

  <!-- Custom Style   -->
  <link rel="stylesheet" href="./css/admin.css">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Domains</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">New Blog</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="parent">
          <!-- <div class="float-start">
                        <h4>Available Domains</h4>
                        <button type="submit" class="btn btn-primary dom-button">Delete</button>
                    </div>
                    <form class="domain-form">
                    <div class="float-end">
                        <h4>Add Domain</h4>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="newDomain" placeholder="New Domain">
                        </div>
                        <button type="submit" class="btn btn-primary dom-button">Add</button>
                    </div> -->
          <form action="./includes/upload_topic.php" method="post" enctype="multipart/form-data">
          <div id="app">
            <h1>Add Domain</h1>
            <div class="add-item">
              <input type="text" name="topic" id="itemInput" placeholder="Add a new domain">
              <input type="submit" id="addItemButton" value="Add">
            </div>
            <ul id="itemList">
              <!-- Existing items will be displayed here -->
            </ul>
          </div>
          <!-- </form> -->
          <script>

            // Function to add a new item to the list
            // function addItem() {
            //   const itemInput = document.getElementById('itemInput');
            //   const itemText = itemInput.value.trim();

            //   if (itemText === '') {
            //     return; // Don't add empty items
            //   }

            //   const itemList = document.getElementById('itemList');
            //   const listItem = document.createElement('li');
            //   listItem.className = 'item';

            //   const itemTextElement = document.createElement('span');
            //   itemTextElement.textContent = itemText;

            //   const deleteButton = document.createElement('button');
            //   deleteButton.className = 'delete-button';
            //   deleteButton.textContent = 'Delete';
            //   deleteButton.addEventListener('click', () => {
            //     listItem.remove(); // Delete the item when the button is clicked
            //   });

            //   listItem.appendChild(itemTextElement);
            //   listItem.appendChild(deleteButton);
            //   itemList.appendChild(listItem);

            //   itemInput.value = ''; // Clear the input field
            // }

            // // Add item button click event handler
            // const addItemButton = document.getElementById('addItemButton');
            // addItemButton.addEventListener('click', addItem);

            // // Enter key press event handler for adding an item
            // const itemInput = document.getElementById('itemInput');
            // itemInput.addEventListener('keypress', (event) => {
            //   if (event.key === 'Enter') {
            //     addItem();
            //   }
            // });

          </script>
          <div class="container" style="border: solid 2px black; height: 200px; border-radius: 20px; overflow-y: auto;">

          <?php
              $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id");
              $topic_num = mysqli_num_rows($all_topic);
              while ($topic = mysqli_fetch_array($all_topic)){
                  echo "
                  <div>
                  <p style=' margin:10px; font-size: 18px; position: relative; ms-overflow: auto'>
                  <label>
                    <input type='submit' name='delete' value='" . $topic['id'] . "' / style='display: none;'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 50 50' style='fill:#c70000;'>
                      <path d='M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z'></path>
                    </svg>
                  </label>
                  {$topic['topic']}</p></div>";
              }
              ?>

          </div>
        </div>
        </form>
      </div>

      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <form class="addform" action="./includes/add_post.php" method="post" enctype="multipart/form-data">
        <div class="container text-center">
          <div class="add-domain" style="margin-bottom: 20px;">
            <h5 class="headh5">Select Domain</h5>
            <div class="select-box">
            <div class="select-box__current" tabindex="1">

            <?php
              $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id");
              $topic_num = mysqli_num_rows($all_topic);
              while ($topic = mysqli_fetch_array($all_topic)){
                  echo "
                  <div class='select-box__value'>
                  <input class='select-box__input' type='radio' id={$topic['id']} value={$topic['topic']} name='Ben' checked='checked' />
                  <p class='select-box__input-text'>{$topic['topic']}</p>
                 </div>
              ";
              }
              ?>
            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"alt="Arrow Icon" aria-hidden="true" />
            </div>
            <ul class="select-box__list">
            <?php
            $all_topic = mysqli_query($conn,"SELECT * FROM topic ORDER BY id");
            $topic_num = mysqli_num_rows($all_topic);
            while ($topic = mysqli_fetch_array($all_topic)){
                  echo "
                  <li>
                  <label class='select-box__option' for={$topic['id']} aria-hidden='aria-hidden'>{$topic['topic']}</label>
                  </li>
              ";
              }
            ?>
            </ul>
            </div>
            
                


            <!-- <div class="select-box">
              <!-- <div class="select-box__current" tabindex="1">
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="0" value="1" name="Ben" checked="checked" />
                  <p class="select-box__input-text">Cream</p>
                </div>
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="1" value="2" name="Ben" checked="checked" />
                  <p class="select-box__input-text">Cheese</p>
                </div>
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="2" value="3" name="Ben" checked="checked" />
                  <p class="select-box__input-text">Milk</p>
                </div>
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="3" value="4" name="Ben" checked="checked" />
                  <p class="select-box__input-text">Honey</p>
                </div>
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="4" value="5" name="Ben" checked="checked" />
                  <p class="select-box__input-text">Toast</p>
                </div><img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg"
                  alt="Arrow Icon" aria-hidden="true" />
              </div> -->
              <!-- <ul class="select-box__list">
                <li>
                <label class="select-box__option" for="0" aria-hidden="aria-hidden">Cream</label>
                </li>
                <li>
                  <label class="select-box__option" for="1" aria-hidden="aria-hidden">Cheese</label>
                </li>
                <li>
                  <label class="select-box__option" for="2" aria-hidden="aria-hidden">Milk</label>
                </li>
                <li>
                  <label class="select-box__option" for="3" aria-hidden="aria-hidden">Honey</label>
                </li>
                <li>
                  <label class="select-box__option" for="4" aria-hidden="aria-hidden">Toast</label>
                </li>
              </ul> 
            </div> -->
          </div>



          
            <div class="row mb-3">
              <div class="col">
                <input type="text" class="form-control" name="toolcontent" placeholder="AI for Text">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="contentprompt" placeholder="Prompt for Text">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <input type="text" class="form-control" name="toolimage" placeholder="AI for Image">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="imageprompt" placeholder="Prompt for Image">
              </div>
            </div>
            <div class="md-form" style="margin-right:60px;">
              <textarea id="form7" class="col md-textarea form-control" name="postcont" rows="4" style="border-radius:20px;" placeholder="Blog Content"></textarea>
            </div>

            <div class="upload-container">
              <h5 style="text-align: start;">Upload Image</h5>
              <div id="drop-area" class="drop-area">
                <input type="file" id="fileElem" name="post_ima" multiple accept="image/*" onchange="handleFiles(this.files)">
                <div class="labels">
                  <label class="button" for="fileElem">Select some files</label>
                </div>
              </div>
              <div class="button-container">
                <button type="submit" class="btn btn-primary custom-button">Add</button>
              </div>
            </div>
          </form>
          <script>
            let dropArea = document.getElementById('drop-area');
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
              dropArea.addEventListener(eventName, preventDefaults, false)
            })

            function preventDefaults(e) {
              e.preventDefault()
              e.stopPropagation()
            }
            ;['dragenter', 'dragover'].forEach(eventName => {
              dropArea.addEventListener(eventName, highlight, false)
            })

              ;['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false)
              })

            function highlight(e) {
              dropArea.classList.add('highlight')
            }

            function unhighlight(e) {
              dropArea.classList.remove('highlight')
            }
            dropArea.addEventListener('drop', handleDrop, false)
            // <!-- ------------ Files Drop ------------------------- -->
            function handleDrop(e) {
              let dt = e.dataTransfer
              let files = dt.files

              handleFiles(files)
            }
            // <!-- ------------ Convert file list to array ------------------------- -->
            function handleFiles(files) {
              ([...files]).forEach(uploadFile)
            }
            // <!-- ------------ Upload files ------------------------- -->
            function uploadFile(file) {
              let url = 'YOUR URL HERE'
              let formData = new FormData()

              formData.append('file', file)

              fetch(url, {
                method: 'POST',
                body: formData
              })
                .then(() => { /* Done. Inform the user */ })
                .catch(() => { /* Error. Inform the user */ })
            }
            // <!-- ------------ Drag & Drop API ------------------------- -->
            function uploadFile(file) {
              var url = 'YOUR URL HERE'
              var xhr = new XMLHttpRequest()
              var formData = new FormData()
              xhr.open('POST', url, true)

              xhr.addEventListener('readystatechange', function (e) {
                if (xhr.readyState == 4 && xhr.status == 200) {
                  // Done. Inform the user
                }
                else if (xhr.readyState == 4 && xhr.status != 200) {
                  // Error. Inform the user
                }
              })

              formData.append('file', file)
              xhr.send(formData)
            }
            // <!-- ------------ Preview ------------------------- -->
            function previewFile(file) {
              let reader = new FileReader()
              reader.readAsDataURL(file)
              reader.onloadend = function () {
                let img = document.createElement('img')
                img.src = reader.result
                document.getElementById('gallery').appendChild(img)
              }
            }



          </script>
        </div>
      </div>
    </div>
  </div>
</body>

</html>