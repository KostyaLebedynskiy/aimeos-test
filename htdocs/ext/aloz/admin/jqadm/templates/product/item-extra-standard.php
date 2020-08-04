<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2018
 */

$enc = $this->encoder();
?>
<div id="extra" class="item-selection content-block tab-pane fade" role="tablist" aria-labelledby="extra">
	<p>Доставка</p>

	<div class="form-group row optional">
		<label class="col-sm-4 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'Самовивіз' ) ); ?></label>
		<div class="col-sm-8">
			<input class="form-control" type="checkbox" value="1" tabindex="<?= $this->get( 'tabindex' ); ?>"
				name="<?= $enc->attr( $this->formparam( array( 'extra', 'delivery-self' ) ) ); ?>"
				<?= $this->get( 'extraData/delivery-self', 0 ) ? 'checked="checked"' : ''; ?>
			/>
		</div>
		<div class="col-sm-12 form-text text-muted help-text">
			<?= $enc->html( $this->translate( 'admin', 'Самовивіз' ) ); ?>
		</div>
	</div>
	<div class="form-group row optional">
		<label class="col-sm-4 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'Доставка Новою Поштою' ) ); ?></label>
		<div class="col-sm-8">
			<input class="form-control" type="checkbox" value="1" tabindex="<?= $this->get( 'tabindex' ); ?>"
				name="<?= $enc->attr( $this->formparam( array( 'extra', 'delivery-nova' ) ) ); ?>"
				<?= $this->get( 'extraData/delivery-nova', 0 ) ? 'checked="checked"' : ''; ?>
			/>
		</div>
		<div class="col-sm-12 form-text text-muted help-text">
			<?= $enc->html( $this->translate( 'admin', 'Доставка Новою Поштою' ) ); ?>
		</div>
	</div>
	<div class="form-group row optional">
		<label class="col-sm-4 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'Доставка УкрПоштою' ) ); ?></label>
		<div class="col-sm-8">
			<input class="form-control" type="checkbox" value="1" tabindex="<?= $this->get( 'tabindex' ); ?>"
				name="<?= $enc->attr( $this->formparam( array( 'extra', 'delivery-ukr' ) ) ); ?>"
				<?= $this->get( 'extraData/delivery-ukr', 0 ) ? 'checked="checked"' : ''; ?>
			/>
		</div>
		<div class="col-sm-12 form-text text-muted help-text">
			<?= $enc->html( $this->translate( 'admin', 'Доставка УкрПоштою' ) ); ?>
		</div>
	</div>

</div>