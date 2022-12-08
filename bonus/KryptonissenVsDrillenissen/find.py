import re

# read the file
with open('readme8.txt', 'r') as f:
    file_contents = f.read()

# find all the space-separated hashes in the file
hashes = file_contents.split()

# compile a regex pattern to match valid BTC wallet addresses
btc_address_pattern = re.compile('^[13][a-km-zA-HJ-NP-Z1-9]{26,33}$')

# find all the valid BTC wallet addresses in the list of hashes
valid_btc_addresses = [hash for hash in hashes if btc_address_pattern.match(hash)]

# print the valid BTC wallet addresses
print(valid_btc_addresses)
