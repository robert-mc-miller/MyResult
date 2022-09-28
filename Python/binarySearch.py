def binarySearch(barlist, target):
    s = 0
    e = len(barlist) - 1
    position = 0 
    found = False
    while found == False and s <= e:
        m = int((s+e)/2)
        if target == barlist[m]:
            position = m
            found = True 
        elif target < barlist[m]:
            e = m - 1
        else:
            s = m + 1
        
    if found == False:
        return "Not Found"
    else:
        return str(target) + " was found in position " + str(position)


# barList1 = [13, 16, 19, 20, 21, 27, 30]
# binarySearch(barList1, 35)

barList2 = ["Monty", "Python", "Thelma", "Louise", "Bonnie", "Clyde", "Stella"]
print(binarySearch(barList2, "Bonnie"))