import os
import re

directory = 'resources/views/dashboard'

# Regex to match the title tag
# <h3 class="text-4xl font-black text-[#1E3A8A] tracking-tighter uppercase leading-none">...</h3>
title_pattern = re.compile(r'(<h3\s+class="text-4xl font-black text-\[#1E3A8A\] tracking-tighter uppercase.*? leading-none">)(.*?)(</h3>)', re.DOTALL)

def clean_title_html(match):
    start_tag = match.group(1)
    content = match.group(2)
    end_tag = match.group(3)
    
    # Remove all HTML tags inside the title
    clean_text = re.sub(r'<[^>]+>', '', content)
    # Remove any trailing dot
    clean_text = clean_text.strip()
    if clean_text.endswith('.'):
        clean_text = clean_text[:-1]
    
    return f"{start_tag}\n                {clean_text}\n            {end_tag}"

for filename in os.listdir(directory):
    if filename.endswith('.blade.php'):
        filepath = os.path.join(directory, filename)
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content = title_pattern.sub(clean_title_html, content)
        
        if new_content != content:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Updated titles in {filename}")

