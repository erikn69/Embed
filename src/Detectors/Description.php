<?php
declare(strict_types = 1);

namespace Embed\Detectors;

class Description extends Detector
{
    public function detect(): ?string
    {
        $oembed = $this->extractor->getOEmbed();
        $metas = $this->extractor->getMetas();
        $ld = $this->extractor->getLinkedData();

        return $oembed->str('description')
            ?: $metas->str('og:description', 'twitter:description', 'lp:description', 'description', 'dcterms.description')
            ?: $ld->str('description');
    }
}
