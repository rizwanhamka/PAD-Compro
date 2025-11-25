function siteToId($site)
{
    return [
        'yayasan' => 1,
        'tk' => 2,
        'sd' => 3,
        'smp' => 4,
        'sma' => 5,
    ][$site] ?? 1;
}
