def bubbleSort(array):
    found = False
    while found == False:
        found = True
        for x in range(len(array)-1):
            if array[x] >  array[x+1]:
                temp = array[x]
                array[x] = array[x+1]
                array[x+1] = temp
                found = False
        
    return array

print(bubbleSort([1,4,5,6,3,4,7,8,9,6,5,43,3,2]))