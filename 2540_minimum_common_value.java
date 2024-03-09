class Solution {
    public int getCommon(int[] nums1, int[] nums2) {

      for (int i = 0; i < nums1.length; i++) {
        int startIndexOfNums2 = 0;
        for (int j = startIndexOfNums2; j < nums2.length; j++, startIndexOfNums2++) {
          if (nums1[i] == nums2[j]) {
            return nums1[i];
          }

          if (nums1[i] < nums2[j]) {
            break;
          }
        }
      }

      return -1;
    }
}
