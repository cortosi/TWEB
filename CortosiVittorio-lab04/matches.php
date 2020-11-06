<?php include "top.html"; ?>
<div class="content">
    <div class="form">
        <form action="./matches-submit.php" method="POST">
            <fieldset>
                <legend>Returning User:</legend>
                <div>
                    <label for="Name"> <strong>Name:</strong> </label>
                    <input type="text" maxlength="16" id="name" name="name" value="">
                </div>
                <input type="submit" value="View My Matches">
            </fieldset>
        </form>
    </div>
</div>
<?php include "bottom.html"; ?>