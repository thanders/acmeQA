
    <form action="/deleteQuestion/{{ $question->rowid }}" method="POST">

        <?php

        $token =csrf_token();
        echo "<input type='hidden' name='_token' value='$token'>";

        ?>

        <button>Delete</button>
    </form>