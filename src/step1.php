<?php
global $message;
if (!isset($_REQUEST['step']) || ($_REQUEST['step'] == 'step1'))
{
$userhost = get_option('userhost');
$mailrelay_api_key = get_option('mailrelay_api_key');

if ($message)
{
    ?>
    <div class="error"><p><?php echo _e($message, "mailrelay"); ?></p></div><?php
}
?>

<div class="wrap">
<?php
    screen_icon('options-general');
    echo "<h2 id='mailrelay_settings'>";
    echo _e('Mailrelay Step 1 - Sync settings', 'mailrelay') . "</h2>";
?>

<form name="webservices_form" method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="chk_hidden" value="Y">
    <input type="hidden" name="page" value="web2">
    <input type="hidden" name="step" value="step2">

    <table class="form-table">
        <tr><th scope="row"><label for="userhost"><?php _e("Host:", "mailrelay"); ?></label></th>
        <td><input type="text" name="userhost" value="<?php echo $userhost; ?>" size="40" /><p>
        <?php _e("Please enter the host that you have in your Mairelay welcome email. Please enter it without the initial http:// (for example demo.ip-zone.com)", "mailrelay"); ?>
        </p></td></tr>
        <tr><th scope="row"><label for="mailrelay_api_key"><?php _e("API key: ", "mailrelay"); ?></label></th>
        <td><input type="text" name="mailrelay_api_key" value="<?php echo $mailrelay_api_key; ?>" size="50" /><p><?php
            _e("Please enter your API key. You can generate your API key on your Mailrelay panel, Configuration -> API access -> Generate API key",  "mailrelay"); ?></p>
        </td></tr>
    </table>
    <?php
    $submit_text = __('Save Changes', 'webserve_trdom');
    submit_button($submit_text, 'primary', 'options');
    ?>
</form>
</div>
<?php } ?>