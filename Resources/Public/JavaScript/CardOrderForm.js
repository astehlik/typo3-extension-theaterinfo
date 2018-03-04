(function($) {
  var formatNumer = function(number) {
    numeral.locale('de');
    var numberNumeral = numeral("" + number);
    number = numberNumeral.format('0,0.00 $');
    return number;
  };

  $.widget('theaterinfo.cardOrderTableAmountColumn', {
    _create: function() {
      var that = this;
      this.element.find('.amount-input').on('blur', function() {
        that._trigger('amountChanged');
      });
    },

    getPriceSum: function() {
      var amountColumn = this.element;
      var price = parseFloat(amountColumn.data('amount-column-price'));

      var amountValue = amountColumn.find('.amount-input').val();
      var amount = amountValue ? parseInt(amountValue) : 0;

      return price * amount;
    }
  });

  $.widget('theaterinfo.cardOrderTableRow', {
    _amountColumns: {},

    _rowSum: 0.0,

    _rowSumLabel: {},

    _create: function() {
      var that = this;

      this._rowSumLabel = this.element.find('.total-price');
      this._amountColumns = this.element.find('.amount-column');

      this._amountColumns.cardOrderTableAmountColumn();
      this._amountColumns.on('cardordertableamountcolumnamountchanged', function() {
        that._updateRowSum();
      });
    },

    getRowSum: function() {
      return this._rowSum;
    },

    _updateRowSum: function() {
      var that = this;
      this._rowSum = 0.0;
      this._amountColumns.each(function() {
        var amountColumn = $(this);
        that._rowSum += amountColumn.cardOrderTableAmountColumn('instance').getPriceSum();
      });

      this._rowSumLabel.text(formatNumer(this._rowSum));

      this._trigger('rowSumChanged');
    }
  });

  $.widget('theaterinfo.cardOrderTable', {
    _orderTableRows: {},

    _shippingCosts: 0.0,

    _totalSum: 0.0,

    _totalSumLabel: {},

    _create: function() {
      var that = this;

      this.element.find('.tx-theaterinfo-no-javascript-hint').hide();

      this._shippingCosts = parseFloat(this.element.data('card-order-shipping-costs'));

      this._totalSum = this._shippingCosts;
      this._totalSumLabel = this.element.find('.card-order-table-total');

      this._orderTableRows = this.element.find('.card-order-row');
      this._orderTableRows.cardOrderTableRow();
      this._orderTableRows.on('cardordertablerowrowsumchanged', function() {
        that._updateTotalSum();
      });
    },

    _updateTotalSum: function() {
      var that = this;
      this._totalSum = this._shippingCosts;
      this._orderTableRows.each(function() {
        var orderTableRow = $(this);
        that._totalSum += orderTableRow.cardOrderTableRow('getRowSum');
      });

      this._totalSumLabel.text(formatNumer(this._totalSum));
    }
  });
})(jQuery);
