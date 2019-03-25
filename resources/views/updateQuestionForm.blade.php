
        <?php
        $qUpdate = URL::to("/updateQuestion");
        echo "<form class='' action='$qUpdate' method='post'>";
        $token =csrf_token();
        echo "<input type='hidden' name='_token' value='$token'>";
        echo "<input type='hidden'  name='rowid' value='$question->rowid'>";
        echo "<input type='text' name='question' value='' required>";
        echo "<td><button type='submit'> Update </button></td>";
        echo "</form>";
        ?>