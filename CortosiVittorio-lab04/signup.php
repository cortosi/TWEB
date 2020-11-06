<?php include "top.html"; ?>
<div class="content">
    <div class="form">
        <form action="./signup-submit.php" method="POST">
            <fieldset>
                <legend>New User Signup:</legend>
                <div>
                    <label for="Name"> <strong>Name:</strong> </label>
                    <input type="text" maxlength="16" id="name" name="name" value="">
                </div>
                <div>
                    <label for="gender"><strong>Gender</strong></label>
                    <input type="radio" id="gender"  name="gender"  value="male">
                    <label for="male">Male</label>
                    <input type="radio" checked="checked" id="gender" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <div>
                    <label for="Name"> <strong>Age:</strong> </label>
                    <input type="number" size="5" maxlength="6" id="age" name="age" value="null">
                </div>
                <div>
                    <label for="Name"> <strong>Personality type:</strong> </label>
                    <input type="text" size="5" maxlength="4" id="pt" name="pt" value="">
                    <span>(<a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp">Don't know your type?</a>)</span>
                </div>
                <div>
                    <label for="Name"> <strong>Favorite OS:</strong> </label>
                    <select name="os" id="os" name="os">
                        <option value="windows">Windows</option>
                        <option selected="selected" value="Linux">Linux</option>
                        <option value="macos">MacOS</option>
                    </select>
                </div>
                <div>
                    <label for="Name"> <strong>Seeking age:</strong> </label>
                    <input type="text" placeholder="Min" size="6" maxlength="6" id="name" name="samin" value=""> to
                    <input type="text" placeholder="Max" size="6" maxlength="6" id="name" name="samax" value="">
                </div>
                <input type="submit" value="SignUp">
            </fieldset>
        </form>
    </div>
</div>
<?php include "bottom.html"; ?>