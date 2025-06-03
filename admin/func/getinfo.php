<form action='?' method='post' name='forma'>
<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">

<table class="tbl_borders" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#fff">
<?php
	if($msg!='')
	{
		echo '
			<tr align="left">
				<td class="for_td" colspan="2" align="left">
					'.$msg.'
				</td>
			</tr>
		';
	}
?>
  <tr align="left">
    <td class='for_td' align='right' width='50%'>ოთახი</td>
    <td class='for_td' align='left' style='font-size:20px;'><?php echo $Account->get('id',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>კომპანია და ს.კ</td>
    <td class='for_td' align='left'><?php echo $Account->get('company_name',$user_id); echo $Account->get('company_id',$user_id); ?> </td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>სახელი</td>
    <td class='for_td' align='left'><?php echo $Account->get('name',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>გვარი</td>
    <td class='for_td' align='left'><?php echo $Account->get('lastname',$user_id); ?></td>
  </tr>
  <!-- <tr align="left">
    <td class='for_td' align='right'>მისამართი</td>
    <td class='for_td' align='left'><?php /*echo $Account->get('choosed_full_address',$user_id);*/ ?></td>
  </tr> 
  <tr align="left">
    <td class='for_td' align='right'>მობილური</td>
    <td class='for_td' align='left'><?php /*$phone_number = $Account->get('choosed_phone',$user_id); echo $phone_number['phone_number'];*/ ?></td>
  </tr>
  -->
  <tr align="left">
    <td class='for_td' align='right'>ელ. ფოსტა</td>
    <td class='for_td' align='left'><?php echo $Account->get('email',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>მობილური</td>
    <td class='for_td' align='left'><?php echo $Account->get('phone',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>პირადი ნომერი</td>
    <td class='for_td' align='left'><?php echo $Account->get('personal_id',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>იურიდიული მისამართი</td>
    <td class='for_td' align='left'><?php echo $Account->get('judical_address',$user_id); ?></td>
  </tr>
  <tr align="left">
    <td class='for_td' align='right'>ფაქტიური მისამართი</td>
    <td class='for_td' align='left'><?php echo $Account->get('current_address',$user_id); ?></td>
  </tr>
  <!-- <tr align="left">
    <td class='for_td' align='right'>პირადი ნომერი</td>
    <td class='for_td' align='left'><?php /*echo $Account->get('privateNumber',$user_id);*/ ?></td>
  </tr> -->
 <!--  <tr align="left">
    <td class='for_td' align='right'>დაბადების თარიღი</td>
    <td class='for_td' align='left'><?php /*echo Tools::dateReverse($Account->get('birthDay',$user_id));*/ ?></td>
  </tr> -->
  <tr align="left">
    <td class='for_td' align='right'>შეკვეთები</td>
    <td class='for_td' align='left'><a href="index.php?cat=orders&user_id=<?php echo $user_id; ?>" target="_blank">შეკვეთებზე გადასვლა</a></td>
  </tr>
  <!-- <tr align="left">
    <td class='for_td' align='right'>ტრანზაქციები</td>
    <td class='for_td' align='left'><a href="index.php?cat=transactions&user_id=<?php echo $user_id; ?>" target="_blank">ტრანზაქციებზე გადასვლა</a></td>
  </tr> -->
  <tr align="left">
    <td class='for_td' align='right'>ჯგუფი</td>
    <td class='for_td' align='left'>
      <select name="price_group">
        <?php
          // foreach($GoodsAI->get_price_group() as $k => $v)
          // {
          //   echo '<option value="'.$v['group_id'].'"></option>';
          // }

           echo Tools::getFilters($menu_id = 2, 2, 'option', $Account->get('price_group',$user_id));
        ?>
      </select>
    </td>
  </tr>
  <tr align="left">
    <td class='for_td' colspan="2" align='center'>
		<input type="submit" name="submit" value="დამახსოვრება" style="padding:8px 12px">
	</td>
  </tr>
</table>

</form>