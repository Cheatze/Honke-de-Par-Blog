<div class='container content'>
    <div class='row'>
    <div class="column col-lg-1" ></div>
        <!-- value = echo"$value" -->
    <div id="artikel" class="collum col-lg-10" style="background-color:#bbb; margin-top:20px;">
        <p>Edit Blogpost</p>
        <div class="container" style="height: 350px;"><!--onsubmit="return validateBlogPost()"-->
            <form name="blogposts" action="" method="POST" onsubmit="return validateBlogPost()" enctype="multipart/form-data">
                <label for="text">Title:</label>
                <input type="text" name="title" value="<?php echo"$title" ?>">
                <label for="textarea">Content:</label>
                <textarea name="ckeditor" id="reset" value=""></textarea>
                <button type="submit" name="blogPost" class="btn btn-primary">Submit</button>
            </form>
        </div>   
    </div>        
    <!-- practically for padding -->
    <div class="column col-lg-1" ></div>
    </div>
</div>

<div class='container content'>
    <div class='row'>
        <div class='column col-lg-2'></div>
        <div id='artikel' class='column col-lg-7' style='background-color:#bbb; color:Navy;'>
            <h3>Delete</h3>
            <form name='delete' method='post' action=''>
                <button type='submit' name='deletebtn' value='del' lass='btn btn-primary' onclick="return confirm('Are you sure you want to delete?')">Delete entry</button>
            </form>
        </div>
        <div class='column col-lg-3' style=''></div>
    </div>
</div>