import os
import re

dashboard_dir = r"f:\software\EIS_Project\resources\views"

# Matches rounded-sm, rounded-md, rounded-lg, rounded-xl, rounded-2xl, rounded-3xl, etc.
# Matches rounded-[2.5rem], rounded-[3rem], etc.
# Matches standalone "rounded"
# DOES NOT MATCH rounded-full, rounded-t-*, rounded-r-*, rounded-l-*, rounded-b-*

# Use a function to filter
def replace_rounded(match):
    val = match.group(0)
    if 'rounded-full' in val:
        return val
    # If it is rounded-t, rounded-r, rounded-b, rounded-l, or rounded-tl etc, ignore
    if re.match(r'rounded-[trbl]+(?:-[a-z0-9\[\]\.]+)?', val):
        return val
    return 'rounded-[5px]'

pattern = re.compile(r'(?<!\w)rounded(?:-(?:sm|md|lg|xl|[2-9]xl|\[[a-zA-Z0-9\.]+\]))?(?!\w)')

count = 0
for root, dirs, files in os.walk(dashboard_dir):
    for filename in files:
        if filename.endswith(".blade.php"):
            filepath = os.path.join(root, filename)
            with open(filepath, "r", encoding="utf-8") as f:
                content = f.read()
                
            new_content = pattern.sub(replace_rounded, content)
            
            if new_content != content:
                with open(filepath, "w", encoding="utf-8") as f:
                    f.write(new_content)
                count += 1

print(f"Updated {count} files.")
