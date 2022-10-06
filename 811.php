<?php

// 811. 子域名访问计数
// https://leetcode.cn/problems/subdomain-visit-count/

class Solution
{

    /**
     * @param String[] $cpdomains
     * @return String[]
     */
    public function subdomainVisits($cpdomains)
    {

        $visitCount = []; // domain => count

        foreach ($cpdomains as $cpdomain) {
            list($count, $domain) = explode(' ', $cpdomain);
            $visitCount = $this->getDomains($domain, $count, $visitCount);
        }

        return $this->formatResult($visitCount);
    }

    protected function getDomains($fullDomain, $count, $visitCount)
    {

        $items = explode('.', $fullDomain);
        $currentDomain = '';
        for ($i = count($items) - 1; $i >= 0; $i--) {
            $currentDomain = $items[$i] . '.' . $currentDomain;

            $savedCount = $visitCount[$currentDomain] ?? 0;

            $visitCount[$currentDomain] = $savedCount + $count;
        }

        return $visitCount;
    }

    protected function formatResult($visitCount)
    {
        $result = [];

        foreach ($visitCount as $domain => $count) {
            $result[] = $count . ' ' . substr($domain, 0, strlen($domain) - 1);
        }

        return $result;
    }
}

$obj = new Solution();

$cpdomains = ["9001 discuss.leetcode.com"];
var_export($obj->subdomainVisits($cpdomains));

$cpdomains = ["900 google.mail.com", "50 yahoo.com", "1 intel.mail.com", "5 wiki.org"];
var_export($obj->subdomainVisits($cpdomains));
