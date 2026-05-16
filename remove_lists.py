import re
import os

filepath = r"f:\software\EIS_Project\resources\views\dashboard\index.blade.php"

with open(filepath, "r", encoding="utf-8") as f:
    content = f.read()

# Find Perolehan: Senarai Kontrak Aktif
idx1 = content.find('Perolehan: Senarai Kontrak Aktif')
if idx1 != -1:
    # Find the start of the comment
    idx_start = content.rfind('{{--', 0, idx1)
    
    idx_end = content.find('<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>')
    if idx_start != -1 and idx_end != -1:
        # Also remove the </div> wrapper if we need to?
        # Actually, let's keep the content before idx_start, and after idx_end,
        # but check if we need to keep a closing </div> for the content-fluid container
        new_content = content[:idx_start] + "</div>\n\n" + content[idx_end:]
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(new_content)
        print("Successfully removed the lists.")
    else:
        print("End tag not found.")
else:
    print("Start tag not found.")
