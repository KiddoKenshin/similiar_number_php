Two non-negative numbers N and M are called similar if their decimal representations (without leading zeros)
can be obtained from each other by rearranging the digits. For example, in each of the following pairs one integer is similar to the other.

    123 and 321
    52832 and 22835
    12 and 21

Write a function such that given a non-negative integer N returns the number of non-negative integers similar to N.

For example, given N=1213 the function should return 12 because there are twelve integers similar to 1213 namely:

1123, 1132, 1213, 1231, 1312, 1321, 2113, 2131, 2311, 3112, 3121 and 3211.

If N = 0, it should return 1.

If N = 100, it should also return 1 as 010 or 001 is not valid.
