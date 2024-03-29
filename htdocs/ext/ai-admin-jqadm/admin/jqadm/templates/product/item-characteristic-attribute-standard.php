<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2018
 */


$enc = $this->encoder();

$keys = [
	'product.lists.id', 'product.lists.siteid', 'product.lists.refid',
	'attribute.label', 'attribute.type'
];


?>
<div class="col-xl-12 content-block item-characteristic-attribute">

	<table class="attribute-list table table-default"
		data-items="<?= $enc->attr( json_encode( $this->get( 'attributeData', [] ), JSON_HEX_AMP ) ); ?>"
		data-keys="<?= $enc->attr( json_encode( $keys, JSON_HEX_AMP ) ) ?>"
		data-prefix="product.lists."
		data-siteid="<?= $this->site()->siteid() ?>" >

		<thead>
			<tr>
				<th>
					<span class="help"><?= $enc->html( $this->translate( 'admin', 'Type' ) ); ?></span>
					<div class="form-text text-muted help-text">
						<?= $enc->html( $this->translate( 'admin', 'Attribute type that limits the list of available attributes' ) ); ?>
					</div>
				</th>
				<th>
					<span class="help"><?= $enc->html( $this->translate( 'admin', 'Attributes' ) ); ?></span>
					<div class="form-text text-muted help-text">
						<?= $enc->html( $this->translate( 'admin', 'Product attributes that are used by other products too' ) ); ?>
					</div>
				</th>
				<th class="actions">
					<div class="btn act-add fa" tabindex="<?= $this->get( 'tabindex' ); ?>"
						title="<?= $enc->attr( $this->translate( 'admin', 'Insert new entry (Ctrl+I)') ); ?>"
						v-on:click="addItem()">
					</div>
				</th>
			</tr>
		</thead>

		<tbody is="draggable" v-model="items" group="characteristic-attribute" handle=".act-move" tag="tbody">

			<tr v-for="(item, idx) in items" v-bind:key="idx"
				v-bind:class="item['product.lists.siteid'] != '<?= $this->site()->siteid() ?>' ? 'readonly' : ''">
				<td v-bind:class="item['css'] || ''">
					<select class="form-control custom-select item-type" required="required" tabindex="<?= $this->get( 'tabindex' ); ?>"
						v-bind:name="'<?= $enc->attr( $this->formparam( array( 'characteristic', 'attribute', 'idx', 'attribute.type' ) ) ); ?>'.replace('idx', idx)"
						v-bind:readonly="checkSite('product.lists.siteid', idx) || item['product.lists.id'] != ''"
						v-model="item['attribute.type']" >

						<option v-if="item['product.lists.id'] == ''" value="" disabled="disabled">
							<?= $enc->html( $this->translate( 'admin', 'Please select' ) ); ?>
						</option>

						<?php foreach( $this->get( 'attributeTypes', [] ) as $item ) : ?>
							<option v-if="item['product.lists.id'] == '' || item['attribute.type'] == '<?= $enc->attr( $item->getCode() ) ?>'"
								v-bind:selected="item['attribute.type'] == '<?= $enc->attr( $item->getCode() ) ?>'"
								value="<?= $enc->attr( $item->getCode() ); ?>" >
								<?= $enc->html( $item->getLabel() ); ?>
							</option>
						<?php endforeach; ?>

					</select>
				</td>
				<td v-bind:class="item['css'] || ''">
					<input class="item-listid" type="hidden" v-model="item['product.lists.id']"
						v-bind:name="'<?= $enc->attr( $this->formparam( ['characteristic', 'attribute', 'idx', 'product.lists.id'] ) ); ?>'.replace( 'idx', idx )" />

					<input class="item-label" type="hidden" v-model="item['attribute.label']"
						v-bind:name="'<?= $enc->attr( $this->formparam( ['characteristic', 'attribute', 'idx', 'attribute.label'] ) ); ?>'.replace( 'idx', idx )" />

					<input class="item-type" type="hidden" v-model="item['attribute.type']"
						v-bind:name="'<?= $enc->attr( $this->formparam( ['characteristic', 'attribute', 'idx', 'attribute.type'] ) ); ?>'.replace( 'idx', idx )" />

					<select is="combo-box" class="form-control custom-select item-refid"
						v-bind:name="'<?= $enc->attr( $this->formparam( ['characteristic', 'attribute', 'idx', 'product.lists.refid'] ) ); ?>'.replace( 'idx', idx )"
						v-bind:readonly="checkSite('product.lists.siteid', idx) || item['product.lists.id'] != ''"
						v-bind:tabindex="'<?= $this->get( 'tabindex' ); ?>'"
						v-bind:label="item['attribute.label']"
						v-bind:required="'required'"
						v-bind:getfcn="getItems"
						v-bind:index="idx"
						v-on:select="update"
						v-model="item['product.lists.refid']" >
					</select>
				</td>
				<td class="actions">
					<div v-if="!checkSite('product.lists.siteid', idx) && item['product.lists.id'] != ''"
						class="btn btn-card-header act-move fa" tabindex="<?= $this->get( 'tabindex' ); ?>"
						title="<?= $enc->attr( $this->translate( 'admin', 'Move this entry up/down' ) ); ?>">
					</div>
					<div v-if="!checkSite('product.lists.siteid', idx)"
						class="btn act-delete fa" tabindex="<?= $this->get( 'tabindex' ); ?>"
						title="<?= $enc->attr( $this->translate( 'admin', 'Delete this entry' ) ); ?>"
						v-on:click.stop="removeItem(idx)">
					</div>
				</td>
			</tr>

		</tbody>

	</table>

	<?= $this->get( 'attributeBody' ); ?>

</div>
