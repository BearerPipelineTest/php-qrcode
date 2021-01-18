<?php
/**
 *
 * @filesource   html.php
 * @created      21.12.2017
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2017 Smiley
 * @license      MIT
 */

namespace chillerlan\QRCodeExamples;

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Common\EccLevel;

require_once '../vendor/autoload.php';

header('Content-Type: text/html; charset=utf-8');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>QRCode test</title>
	<style>
		div.qrcode{
            margin: 5em;
		}

		/* rows */
		div.qrcode > div {
			height: 10px;
		}

		/* modules */
		div.qrcode > div > span {
			display: inline-block;
			width: 10px;
			height: 10px;
		}
	</style>
</head>
<body>
<?php

	$data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';

	$options = new QROptions([
		'version'      => 5,
		'outputType'   => QRCode::OUTPUT_MARKUP_HTML,
		'eccLevel'     => EccLevel::L,
		'cssClass'     => 'qrcode',
		'moduleValues' => [
			// finder
			QRMatrix::M_FINDER | QRMatrix::IS_DARK     => '#A71111', // dark (true)
			QRMatrix::M_FINDER                         => '#FFBFBF', // light (false)
			QRMatrix::M_FINDER_DOT | QRMatrix::IS_DARK => '#A71111', // finder dot, dark (true)
			// alignment
			QRMatrix::M_ALIGNMENT | QRMatrix::IS_DARK  => '#A70364',
			QRMatrix::M_ALIGNMENT                      => '#FFC9C9',
			// timing
			QRMatrix::M_TIMING | QRMatrix::IS_DARK     => '#98005D',
			QRMatrix::M_TIMING                         => '#FFB8E9',
			// format
			QRMatrix::M_FORMAT | QRMatrix::IS_DARK     => '#003804',
			QRMatrix::M_FORMAT                         => '#00FB12',
			// version
			QRMatrix::M_VERSION | QRMatrix::IS_DARK    => '#650098',
			QRMatrix::M_VERSION                        => '#E0B8FF',
			// data
			QRMatrix::M_DATA | QRMatrix::IS_DARK       => '#4A6000',
			QRMatrix::M_DATA                           => '#ECF9BE',
			// darkmodule
			QRMatrix::M_DARKMODULE | QRMatrix::IS_DARK => '#080063',
			// separator
			QRMatrix::M_SEPARATOR                      => '#AFBFBF',
			// quietzone
			QRMatrix::M_QUIETZONE                      => '#DDDDDD',
		],
	]);

	echo (new QRCode($options))->render($data);

?>
</body>
</html>



