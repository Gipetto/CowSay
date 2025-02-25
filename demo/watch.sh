if ! command -v fswatch 2>&1 >/dev/null; then
  brew install fswatch
fi

fswatch -o ./ | while read num ; do \
  php ./index.php > ./index.html
done