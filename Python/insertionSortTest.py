

def insertionSort(array):
    for i in range(1, len(array)):
        temp = array[i]
        j = i - 1

        while j >= 0 and temp < array[j]:
            array[j+1] = array[j]
            j -= 1
            array[j + 1] = temp

    return array

print(insertionSort([1, 2, 3, 4,5 ,6 ,7, 8, 9]))