def binarySearch(array, target):
    s = 0
    e = len(array)-1
    while s<=e:
        m = int((s+e)/2)
        if array[m] == target:
            return "Found in position " + str(m)
        elif array[m] > target:
            e = m - 1
        else:
            s = m + 1
    
    return "Not found"

while 1:
    print(binarySearch([1,2,3,4,5,6,8,9,10], int(input("Number you would like to find:  "))))