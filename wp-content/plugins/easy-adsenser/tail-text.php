<?php
/*
Copyright (C) 2008 www.thulasidas.com

This file is part of the programs "Easy AdSense", "AdSense Now!",
"Theme Tweaker", "Easy LaTeX", "More Money" and "Easy Translator".

These programs are free software; you can redistribute them and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation; either version 3 of the
License, or (at your option) any later version.

These programs are distributed in the hope that they will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with the programs.  If not, see <http://www.gnu.org/licenses/>.

Some of these programs are supported by ad space sharing. Unless you
configure them (following the instructions on its admin page) and
explicitly turn off the sharing, you agree to run its developer's ads
on your site(s). By using any of these programs, you are agreeing to
this condition, and confirming that your sites abide by Google's
policies and terms of service.
*/

$plgname = basename(dirname(__FILE__)) ;
if ($this->defaults['paidsupport'] &&
    ($plgname == 'easy-adsenser' || $plgname == 'adsense-now')) {
?>
<div id="question">
<?php
_e('Due to the large number of support questions (most of which are answered by cutting and pasting the FAQ) I cannot offer free support any more.', 'easy-adsenser') ;
echo htmlspecialchars_decode($this->defaults['support']) ;
?>
</div>
<?php } ?>

<table class="form-table" >
<tr>
<td>

<ul style="padding-left:10px;list-style-type:circle; list-style-position:inside;" >

<?php if ($this->defaults['paidsupport'] &&
          ($plgname == 'easy-adsenser' || $plgname == 'adsense-now')) { ?>
<li>
<?php _e('If you need support', 'easy-adsenser') ; ?>, <a href="#" title="<?php _e('Click for help', 'easy-adsenser') ; ?>" onclick="TagToTip('rate', TITLE, 'WordPress: Easy AdSense', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [25, 25])"> <?php _e('please read the FAQ', 'easy-adsenser') ;?></a>, <?php _e('or pay $3.95 per support question.', 'easy-adsenser') ;?> <span onmouseover="TagToTip('question', WIDTH, 230, TITLE, 'Ad Space Sharing',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 5])" onmouseout="UnTip()"><b><u>Paid Support.</u></b></span>
</li>

<?php } else { ?>
<li>
<?php _e('Please report any problems. And share your thoughts and comments.', 'easy-adsenser') ; ?>&nbsp;<a href="http://wordpress.org/tags/<?php echo $plgname ; ?>" title="<?php _e('Post it in the WordPress forum', 'easy-adsenser') ; ?>" target="_blank"><?php _e("[WordPress Forum]", 'easy-adsenser') ?> </a> <?php _e("Or", 'easy-adsenser') ?> <a href="#" title="<?php _e('Contact the plugin author through email', 'easy-adsenser') ; ?>" onclick="TagToTip('help7', WIDTH, 1000, TITLE, 'Contact Manoj',STICKY, 1, CLOSEBTN, true, FIX, [20,20])"><?php _e("[Email Author]", 'easy-adsenser') ?></a>
<span id="help7">
<iframe src="http://manoj.thulasidas.com/mail.shtml" width="1024px" height="1024px">
</iframe>
</span>
</li>
<?php } ?>

<li>
<?php _e('Check out my other plugin efforts:', 'easy-adsenser') ; ?>

<ul style="margin-left:0px; padding-left:30px;list-style-type:square; list-style-position:inside;" >

<?php if ($plgname != 'easy-adsenser') { ?>

<li>
<a href="http://www.Thulasidas.com/adsense" target="_blank" title="<?php _e('The simplest way to put AdSense to work for you!', 'easy-adsenser') ; ?>"><b>Easy AdSenser</b></a>: <?php _e('The simplest way to put AdSense to work for you!', 'easy-adsenser') ; ?> <?php _e('It puts ads like this into your <em>existing</em> posts.', 'easy-adsenser') ; ?>
</li>

<?php }
if ($plgname != 'easy-translator') { ?>

<li>
<a href="http://wordpress.org/extend/plugins/easy-translator/" target="_blank" title="<?php _e('Translate any plugin!', 'easy-adsenser') ; ?>"><b>Easy Translator</b></a>: <?php _e('To translate any plugin (with internationalized strings) to your language.', 'easy-adsenser') ; ?>
</li>

<?php }
if ($plgname != 'theme-tweaker') { ?>

<li>
<a href="http://wordpress.org/extend/plugins/theme-tweaker/" target="_blank" title="<?php _e('Tweak your color scheme', 'easy-adsenser') ; ?>"><b>Theme Tweaker</b></a>: <?php _e('To modify the color scheme of your themes with no CSS/Stylesheet editing.', 'easy-adsenser') ; ?>
</li>

<?php }
if ($plgname != 'easy-latex') { ?>

<li>
<a href="http://wordpress.org/extend/plugins/easy-latex/" target="_blank" title="<?php _e('LaTeX in your posts', 'easy-adsenser') ; ?>"><b> Easy LaTeX</b></a>: <?php _e('To translate LaTeX formulas like this [math](a+b)^2 = a^2 + b^2 + 2ab[/math] into this:', 'easy-adsenser') ; ?> <br/><img src="http://l.wordpress.com/latex.php?latex=(a%2bb)^2%20=%20a^2%20%2b%20b^2%20%2b%202ab&amp;bg=FFFFFF&amp;s=1" style="vertical-align:-70%;" alt="(a+b)^2 = a^2 + b^2 + 2ab" />
</li>

<?php }
if ($plgname != 'adsense-now') { ?>

<li>
<a href="http://wordpress.org/extend/plugins/adsense-now/" target="_blank" title="<?php _e('The simplest possible way to AdSense enable your blog', 'easy-adsenser') ; ?>"><b> AdSense Now!</b></a>: <?php _e('My lean and mean AdSense plugin. No mess, no fuss.', 'easy-adsenser') ; ?>
</li>

<?php } ?>

</ul>
</li>
</ul>
</td>
</tr>

<?php echo '</table>' ; ?>
