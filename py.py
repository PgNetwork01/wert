import os

for root, dirs, files in os.walk('k:\\'):
    if 'System Volume Information' in dirs:
        dirs.remove('System Volume Information')  # don't visit System Volume Information directory
    for file in files:
        try:
            file_path = os.path.join(root, file)
            print(os.stat(file_path))
        except PermissionError:
            print(f"Permission denied: {file_path}")
