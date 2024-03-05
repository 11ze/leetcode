// https://leetcode.com/problems/two-sum/

impl Solution {
    pub fn two_sum(nums: Vec<i32>, target: i32) -> Vec<i32> {
        // 用 map 保存已经遍历过的子元素
        let mut map = std::collections::HashMap::new();
        for (i, &num) in nums.iter().enumerate() {
            // 计算出当前元素的补数
            let complement = target - num;
            // 如果 map 中存在补数，则返回
            if map.contains_key(&complement) {
                return vec![*map.get(&complement).unwrap(), i as i32];
            }
            map.insert(num, i as i32);
        }
        vec![]
    }
}
