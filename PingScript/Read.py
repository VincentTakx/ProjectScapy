vars = dict()

with open("Ping.txt") as file:
    for line in file:
        eq_index = line.find('=')
        var_name = line[:eq_index].strip()
        number = str(line[eq_index + 1:].strip())
        vars[var_name]=number
        

print(vars["Destination"])
print(vars["Payload"])
print(vars["Amount"])


