##A segmenter for Swahili verbs##

This code segments Swahili verbforms as a precursor to possible use in parsers or taggers. Although some segmenters already exist, they either handle only a few basic forms, or are not available under an open license. This segmenter handles all the one-word tenses in Swahili, and is licensed under the GPLv3 and the AGPLv3.

There are two variants of the segmenter: a PHP [web version](http://kevindonnelly.org.uk/swahili/segmenter), and a PHP commandline version that can be run against a file listing verbforms to be analysed. This latter version could be used to feed an application that would tag connected text.

Future development would include extending the segmenting to other word classes, so that a free Swahili POS-tagger could be created.

The principles here could be also be used to segment verbs in other Bantu languages.
