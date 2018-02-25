<?php
require_once ('GoogleTranslate.php');
use Statickidz\GoogleTranslate;
if (isset($_GET["send"]) && $_GET["send"] != "" && $_GET["source"] != "" && $_GET["target"] != "" && $_GET["text"] != "")
{
    $source = $_GET["source"];
    $target = $_GET["target"];
    $text = $_GET["text"];

    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    echo "<p direction='rtl'>$result</p>";
}
else
{ ?>
<span>لطفا فیلد‌ها را کامل پر کنید. </span>
<form method="get">
	souse lanuage : <input type="text" name="source" />
	target language : <input type="text" name="target" />
	text : <input type="text" name="text" />
	<input type="submit" name="send" />
</form>
<?php
}