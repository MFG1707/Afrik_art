#!/bin/bash

for ((i=5; i<=28; i++)); do
    old_name="sculpture${i}.php"
    new_name="sculpture$((i+3)).php"
    mv "$old_name" "$new_name"
done

