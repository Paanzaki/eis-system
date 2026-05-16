import os
import re

dashboard_dir = r"f:\software\EIS_Project\resources\views"
count = 0
for root, dirs, files in os.walk(dashboard_dir):
    for filename in files:
        if filename.endswith(".blade.php"):
            filepath = os.path.join(root, filename)
            with open(filepath, "r", encoding="utf-8") as f:
                content = f.read()
            
            # Fix rounded-[5px]-something back to rounded-something
            new_content = re.sub(r'rounded-\[5px\]-([a-zA-Z0-9\[\]\-]+)', r'rounded-\1', content)
            
            if new_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(new_content)
                count += 1

print(f"Fixed {count} files.")
