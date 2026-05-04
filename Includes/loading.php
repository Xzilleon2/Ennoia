<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../Includes/head.php'; ?>
<body class="h-screen bg-gray-100 flex items-center justify-center">

<?php
$color    = $color   ?? "bg-[#395B64]";
$size     = $size    ?? "w-2.5 h-2.5";
$redirect = $redirect ?? "index.php";
$delay    = $delay   ?? 2500;
$message  = $message ?? "Please wait…";
?>

<div class="flex flex-col items-center gap-4 min-w-[160px]">

    <div class="flex items-center justify-center space-x-2">
        <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.3s]"></div>
        <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:-0.15s]"></div>
        <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce"></div>
        <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.15s]"></div>
        <div class="<?= $size ?> <?= $color ?> rounded-full animate-bounce [animation-delay:0.3s]"></div>
    </div>

    <p class="text-sm text-gray-500 font-medium"><?= htmlspecialchars($message) ?></p>
</div>

<script>
setTimeout(() => { window.location.href = "<?= htmlspecialchars($redirect) ?>"; }, <?= (int)$delay ?>);
</script>

</body>
</html>