class Solution {
    public int[] intersection(int[] nums1, int[] nums2) {
      HashMap<Integer, Boolean> nums1mapping = new HashMap<>();
      for (int i = 0; i < nums1.length; i++) {
        nums1mapping.put(nums1[i], true);
      }

      List<Integer> result = new ArrayList<>();
      HashMap<Integer, Boolean> nums2mapping = new HashMap<>();

      for (int i = 0; i < nums2.length; i++) {
        if (nums1mapping.containsKey(nums2[i]) && !nums2mapping.containsKey(nums2[i])) {
          result.add(nums2[i]);
          nums2mapping.put(nums2[i], true);
        }
      }

      int[] resultArray = new int[result.size()];
      for (int i = 0; i < result.size(); i++) {
        resultArray[i] = result.get(i);
      }

      return resultArray;
    }
}
