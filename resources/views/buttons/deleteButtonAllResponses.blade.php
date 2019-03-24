

    <div class="button">

        <form action="/truncateResponses" method="POST">
            <input type='hidden'  name='truncate' value='yes'>

            <?php

            $token =csrf_token();
            echo "<input type='hidden' name='_token' value='$token'>";

            ?>

            <button>Delete all Responses</button>

        </form>

    </div>