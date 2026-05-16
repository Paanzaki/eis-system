import os
import re

dashboard_dir = r"f:\software\EIS_Project\resources\views\dashboard"

# Part 1: Clean up index.blade.php
index_path = os.path.join(dashboard_dir, "index.blade.php")
with open(index_path, "r", encoding="utf-8") as f:
    content = f.read()

# Remove AI Insight section
content = re.sub(r'\{\{\-\- AI Insight Card \-\-\}\}.*?</div>\s*</div>\s*</div>', '</div>', content, flags=re.DOTALL)

# Remove all lists/tables and activity stream
# Find the start of Perolehan: Senarai Kontrak Aktif
start_marker = r'\{\{\-\- ── Perolehan: Senarai Kontrak Aktif ── \-\-\}\}'
# Match everything from start_marker to the closing div before the script tags
# Wait, let's use string operations for safety

if '{{-- ── Perolehan: Senarai Kontrak Aktif ── --}}' in content:
    start_idx = content.find('{{-- ── Perolehan: Senarai Kontrak Aktif ── --}}')
    end_idx = content.find('</div>\n\n<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>')
    if start_idx != -1 and end_idx != -1:
        content = content[:start_idx] + content[end_idx:]

with open(index_path, "w", encoding="utf-8") as f:
    f.write(content)

# Part 2: Change border radius across all files
# Regex to match rounded-md, rounded-lg, rounded-xl, rounded-2xl, rounded-3xl, rounded-[something]
# but DO NOT match rounded-full, rounded-t-*, rounded-r-*, etc.
# Also avoid replacing rounded-[5px] if it's already there
# We want to target classes typically used for container borders.
# Let's match: rounded-md, rounded-lg, rounded-xl, rounded-2xl, rounded-3xl, rounded-\[[0-9a-zA-Z\.]+rem\]
radius_pattern = re.compile(r'\brounded-(?:md|lg|xl|2xl|3xl|\[[0-9\.]+rem\])\b')

for filename in os.listdir(dashboard_dir):
    if filename.endswith(".blade.php"):
        filepath = os.path.join(dashboard_dir, filename)
        with open(filepath, "r", encoding="utf-8") as f:
            file_content = f.read()
            
        new_content = radius_pattern.sub('rounded-[5px]', file_content)
        
        if new_content != file_content:
            with open(filepath, "w", encoding="utf-8") as f:
                f.write(new_content)

print("Updates applied.")
