@php
$archiveFile = str_starts_with($path ?? '', '/') ? ($path ?? '') : base_path($path ?? '');
$rawHtml = is_file($archiveFile) ? file_get_contents($archiveFile) : '';

$normalizeLinks = function (string $html): string {
$map = [
'href="index.html"' => 'href="/"',
'href="./index.html"' => 'href="/"',
'href="about/index.html"' => 'href="/about"',
'href="./about/index.html"' => 'href="/about"',
'href="services/index.html"' => 'href="/services"',
'href="./services/index.html"' => 'href="/services"',
'href="streams/index.html"' => 'href="/streams"',
'href="./streams/index.html"' => 'href="/streams"',
'href="gbemidokun/index.html"' => 'href="/gbemidokun"',
'href="./gbemidokun/index.html"' => 'href="/gbemidokun"',
'href="contact/index.html"' => 'href="/contact"',
'href="./contact/index.html"' => 'href="/contact"',
];

return str_replace(array_keys($map), array_values($map), $html);
};

$innerHtml = function (\DOMNode $node): string {
$html = '';
foreach ($node->childNodes as $child) {
$html .= $node->ownerDocument->saveHTML($child);
}

return $html;
};

$bodyAttrs = 'class=""';
$headHtml = '';
$skipLinkHtml = '';
$pageAttrs = 'id="page" class="hfeed site"';
$headerHtml = '';
$contentHtml = '';
$footerHtml = '';
$tailHtml = '';

if ($rawHtml !== '') {
$previous = libxml_use_internal_errors(true);
$dom = new \DOMDocument();
$dom->loadHTML($rawHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
libxml_clear_errors();
libxml_use_internal_errors($previous);

$xpath = new \DOMXPath($dom);

$headNode = $dom->getElementsByTagName('head')->item(0);
if ($headNode) {
$headHtml = $innerHtml($headNode);
}

$bodyNode = $dom->getElementsByTagName('body')->item(0);
if ($bodyNode) {
$attrs = [];
foreach ($bodyNode->attributes ?? [] as $attribute) {
$attrs[] = $attribute->nodeName . '="' . e($attribute->nodeValue) . '"';
}
$bodyAttrs = implode(' ', $attrs);

$skipNode = $xpath->query('.//a[contains(@class, "skip-link")]', $bodyNode)?->item(0);
if ($skipNode) {
$skipLinkHtml = $dom->saveHTML($skipNode);
}

$pageNode = $xpath->query('.//*[@id="page"]', $bodyNode)?->item(0);
if ($pageNode) {
$pageAttrList = [];
foreach ($pageNode->attributes ?? [] as $attribute) {
$pageAttrList[] = $attribute->nodeName . '="' . e($attribute->nodeValue) . '"';
}
$pageAttrs = implode(' ', $pageAttrList);

$headerNode = $xpath->query('.//*[@id="masthead"]', $pageNode)?->item(0);
if ($headerNode) {
$headerHtml = $dom->saveHTML($headerNode);
}

$footerNode = $xpath->query('.//*[@id="colophon"]', $pageNode)?->item(0);
if ($footerNode) {
$footerHtml = $dom->saveHTML($footerNode);
}

$contentNode = $xpath->query('.//*[@id="content"]', $pageNode)?->item(0);
if ($contentNode) {
$contentHtml = $dom->saveHTML($contentNode);
}
}

$bodyChildren = iterator_to_array($bodyNode->childNodes);
$passedPage = false;
foreach ($bodyChildren as $child) {
if (!$passedPage) {
if ($child->nodeType === XML_ELEMENT_NODE && $child->attributes?->getNamedItem('id')?->nodeValue === 'page') {
$passedPage = true;
}
continue;
}

$tailHtml .= $dom->saveHTML($child);
}
}
}

$headHtml = $normalizeLinks($headHtml);
$skipLinkHtml = $normalizeLinks($skipLinkHtml);
$headerHtml = $normalizeLinks($headerHtml);
$contentHtml = $normalizeLinks($contentHtml);
$footerHtml = $normalizeLinks($footerHtml);
$tailHtml = $normalizeLinks($tailHtml);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  {!! $headHtml !!}
</head>

<body {!! $bodyAttrs !!}>
  {!! $skipLinkHtml !!}

  <div {!! $pageAttrs !!}>
    <x-site-header :html="$headerHtml" />
    {!! $contentHtml !!}
    <x-site-footer :html="$footerHtml" />
  </div>

  {!! $tailHtml !!}
</body>

</html>